# Update the apt cache
apt_update 'Update the apt cache daily' do
  frequency 86_400
  action :periodic
end

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
#
# file '/etc/apache2/apache2.conf' do
#   content ""
# end