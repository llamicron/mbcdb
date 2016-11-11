# Update the apt cache
apt_update 'Update the apt cache daily' do
  frequency 86_400
  action :periodic
end

# Install git
package 'git'

# Install mysql-server
package 'mysql-server'

service 'mysql' do
  supports :status => true
  action [:enable, :start]
end

# Install software-properties-common for add-apt-repository command
package 'software-properties-common'

# Add php5 repo
execute 'add_php5' do
  command 'sudo add-apt-repository ppa:ondrej/php'
end

execute "apt-get-update" do
  command "apt-get update"
  ignore_failure true
end

# Install php5
package 'php5'

package 'php5-cli'

# Install MySQL php extension
package 'php5-mysql'

# Install Apache
package 'apache2'

service 'apache2' do
  supports :status => true
  action [:enable, :start]
end

# Install Composer
execute 'install_composer' do
  command "curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/local/bin --filename=composer"
  ignore_failure false
end

git '/var/www/html/mbcdb' do
  repository 'https://github.com/SelectiveAlso/mbcdb.git'
  revision 'master'
  action :sync
end

# Set document root for apache to mbcdb/public in /etc/apache2/sites-enabled/000-default.conf
file '/etc/apache2/sites-enabled/000-default.conf' do
  content '<VirtualHost *:80>
        # The ServerName directive sets the request scheme, hostname and port that
        # the server uses to identify itself. This is used when creating
        # redirection URLs. In the context of virtual hosts, the ServerName
        # specifies what hostname must appear in the requests Host: header to
        # match this virtual host. For the default virtual host (this file) this
        # value is not decisive as it is used as a last resort host regardless.
        # However, you must set it for any further virtual host explicitly.
        #ServerName www.example.com
        ServerAdmin webmaster@localhost
        DocumentRoot /var/www/html/mbcdb/public
        # Available loglevels: trace8, ..., trace1, debug, info, notice, warn,
        # error, crit, alert, emerg.
        # It is also possible to configure the loglevel for particular
        # modules, e.g.
        #LogLevel info ssl:warn
        ErrorLog ${APACHE_LOG_DIR}/error.log
        CustomLog ${APACHE_LOG_DIR}/access.log combined
        # For most configuration files from conf-available/, which are
        # enabled or disabled at a global level, it is possible to
        # include a line for only one particular virtual host. For example the
        # following line enables the CGI configuration for this host only
        # after it has been globally disabled with "a2disconf".
        #Include conf-available/serve-cgi-bin.conf
        <Directory /var/www/html/mbcdb/public>
                Options Indexes FollowSymLinks MultiViews
                AllowOverride All
                Order allow,deny
                allow from all
        </Directory>
</VirtualHost>'
end

file '/etc/apache2/apache2.conf' do
  content '
            Mutex file:${APACHE_LOCK_DIR} default
            PidFile ${APACHE_PID_FILE}
            Timeout 300
            KeepAlive On
            MaxKeepAliveRequests 100
            KeepAliveTimeout 5
            User ${APACHE_RUN_USER}
            Group ${APACHE_RUN_GROUP}
            HostnameLookups Off
            ErrorLog ${APACHE_LOG_DIR}/error.log
            LogLevel warn
            IncludeOptional mods-enabled/*.load
            IncludeOptional mods-enabled/*.conf
            Include ports.conf
            <Directory />
            	Options FollowSymLinks
            	AllowOverride None
            	Require all denied
            </Directory>
            <Directory /usr/share>
            	AllowOverride None
            	Require all granted
            </Directory>
            <Directory /var/www/html/mbcdb/public>
            	Options Indexes FollowSymLinks
            	AllowOverride None
            	Require all granted
            </Directory>
            #<Directory /srv/>
            #	Options Indexes FollowSymLinks
            #	AllowOverride None
            #	Require all granted
            #</Directory>
            AccessFileName .htaccess
            <FilesMatch "^\.ht">
            	Require all denied
            </FilesMatch>
            LogFormat "%v:%p %h %l %u %t \"%r\" %>s %O \"%{Referer}i\" \"%{User-Agent}i\"" vhost_combined
            LogFormat "%h %l %u %t \"%r\" %>s %O \"%{Referer}i\" \"%{User-Agent}i\"" combined
            LogFormat "%h %l %u %t \"%r\" %>s %O" common
            LogFormat "%{Referer}i -> %U" referer
            LogFormat "%{User-agent}i" agent
            IncludeOptional conf-enabled/*.conf
            IncludeOptional sites-enabled/*.conf
          '
end

service 'apache2' do
  action :restart
end

service 'mysql' do
  action :restart
end

# * Supply
file '/var/www/html/mbcdb/.env' do

  content "APP_ENV=local
APP_DEBUG=true
APP_KEY=
APP_URL=http://localhost
PRODUCTION=false

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mbcdb
DB_USERNAME=root
DB_PASSWORD=

CACHE_DRIVER=file
SESSION_DRIVER=file
QUEUE_DRIVER=sync

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_DRIVER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=2525
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_ENCRYPTION=tls
"
end

execute 'composer_install' do
  command '/var/www/html/mbcdb/ composer install'
end

execute 'key:generate' do
  command '/var/www/html/mbcdb/ php artisan key:generate'
end

execute 'migrate' do
  command '/var/www/html/mbcdb/ php artisan migrate'
end

execute 'seed' do
  command '/var/www/html/mbcdb/ php artisan db:seed'
end