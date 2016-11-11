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
  # This is the main Apache server configuration file.  It contains the
  # configuration directives that give the server its instructions.
  # See http://httpd.apache.org/docs/2.4/ for detailed information about
  # the directives and /usr/share/doc/apache2/README.Debian about Debian specific
  # hints.
  #
  #
  # Summary of how the Apache 2 configuration works in Debian:
  # The Apache 2 web server configuration in Debian is quite different to
  # upstreams suggested way to configure the web server. This is because Debians
  # default Apache2 installation attempts to make adding and removing modules,
  # virtual hosts, and extra configuration directives as flexible as possible, in
  # order to make automating the changes and administering the server as easy as
  # possible.

  # It is split into several files forming the configuration hierarchy outlined
  # below, all located in the /etc/apache2/ directory:
  #
  #	/etc/apache2/
  #	|-- apache2.conf
  #	|	`--  ports.conf
  #	|-- mods-enabled
  #	|	|-- *.load
  #	|	`-- *.conf
  #	|-- conf-enabled
  #	|	`-- *.conf
  # 	`-- sites-enabled
  #	 	`-- *.conf
  #
  #
  # * apache2.conf is the main configuration file (this file). It puts the pieces
  #   together by including all remaining configuration files when starting up the
  #   web server.
  #
  # * ports.conf is always included from the main configuration file. It is
  #   supposed to determine listening ports for incoming connections which can be
  #   customized anytime.
  #
  # * Configuration files in the mods-enabled/, conf-enabled/ and sites-enabled/
  #   directories contain particular configuration snippets which manage modules,
  #   global configuration fragments, or virtual host configurations,
  #   respectively.
  #
  #   They are activated by symlinking available configuration files from their
  #   respective *-available/ counterparts. These should be managed by using our
  #   helpers a2enmod/a2dismod, a2ensite/a2dissite and a2enconf/a2disconf. See
  #   their respective man pages for detailed information.
  #
  # * The binary is called apache2. Due to the use of environment variables, in
  #   the default configuration, apache2 needs to be started/stopped with
  #   /etc/init.d/apache2 or apache2ctl. Calling /usr/bin/apache2 directly will not
  #   work with the default configuration.


  # Global configuration
  #

  #
  # ServerRoot: The top of the directory tree under which the servers
  # configuration, error, and log files are kept.
  #
  # NOTE!  If you intend to place this on an NFS (or otherwise network)
  # mounted filesystem then please read the Mutex documentation (available
  # at <URL:http://httpd.apache.org/docs/2.4/mod/core.html#mutex>);
  # you will save yourself a lot of trouble.
  #
  # Do NOT add a slash at the end of the directory path.
  #
  #ServerRoot "/etc/apache2"

  #
  # The accept serialization lock file MUST BE STORED ON A LOCAL DISK.
  #
  Mutex file:${APACHE_LOCK_DIR} default

  #
  # PidFile: The file in which the server should record its process
  # identification number when it starts.
  # This needs to be set in /etc/apache2/envvars
  #
  PidFile ${APACHE_PID_FILE}

  #
  # Timeout: The number of seconds before receives and sends time out.
  #
  Timeout 300

  #
  # KeepAlive: Whether or not to allow persistent connections (more than
  # one request per connection). Set to "Off" to deactivate.
  #
  KeepAlive On

  #
  # MaxKeepAliveRequests: The maximum number of requests to allow
  # during a persistent connection. Set to 0 to allow an unlimited amount.
  # We recommend you leave this number high, for maximum performance.
  #
  MaxKeepAliveRequests 100

  #
  # KeepAliveTimeout: Number of seconds to wait for the next request from the
  # same client on the same connection.
  #
  KeepAliveTimeout 5


  # These need to be set in /etc/apache2/envvars
  User ${APACHE_RUN_USER}
  Group ${APACHE_RUN_GROUP}

  #
  # HostnameLookups: Log the names of clients or just their IP addresses
  # e.g., www.apache.org (on) or 204.62.129.132 (off).
  # The default is off because itd be overall better for the net if people
  # had to knowingly turn this feature on, since enabling it means that
  # each client request will result in AT LEAST one lookup request to the
  # nameserver.
  #
  HostnameLookups Off

  # ErrorLog: The location of the error log file.
  # If you do not specify an ErrorLog directive within a <VirtualHost>
  # container, error messages relating to that virtual host will be
  # logged here.  If you *do* define an error logfile for a <VirtualHost>
  # container, that hosts errors will be logged there and not here.
  #
  ErrorLog ${APACHE_LOG_DIR}/error.log

  #
  # LogLevel: Control the severity of messages logged to the error_log.
  # Available values: trace8, ..., trace1, debug, info, notice, warn,
  # error, crit, alert, emerg.
  # It is also possible to configure the log level for particular modules, e.g.
  # "LogLevel info ssl:warn"
  #
  LogLevel warn

  # Include module configuration:
  IncludeOptional mods-enabled/*.load
  IncludeOptional mods-enabled/*.conf

  # Include list of ports to listen on
  Include ports.conf


  # Sets the default security model of the Apache2 HTTPD server. It does
  # not allow access to the root filesystem outside of /usr/share and /var/www.
  # The former is used by web applications packaged in Debian,
  # the latter may be used for local directories served by the web server. If
  # your system is serving content from a sub-directory in /srv you must allow
  # access here, or in any related virtual host.
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




  # AccessFileName: The name of the file to look for in each directory
  # for additional configuration directives.  See also the AllowOverride
  # directive.
  #
  AccessFileName .htaccess

  #
  # The following lines prevent .htaccess and .htpasswd files from being
  # viewed by Web clients.
  #
  <FilesMatch "^\.ht">
    Require all denied
  </FilesMatch>


  #
  # The following directives define some format nicknames for use with
  # a CustomLog directive.
  #
  # These deviate from the Common Log Format definitions in that they use %O
  # (the actual bytes sent including headers) instead of %b (the size of the
  # requested file), because the latter makes it impossible to detect partial
  # requests.
  #
  # Note that the use of %{X-Forwarded-For}i instead of %h is not recommended.
  # Use mod_remoteip instead.
  #
  LogFormat "%v:%p %h %l %u %t \"%r\" %>s %O \"%{Referer}i\" \"%{User-Agent}i\"" vhost_combined
  LogFormat "%h %l %u %t \"%r\" %>s %O \"%{Referer}i\" \"%{User-Agent}i\"" combined
  LogFormat "%h %l %u %t \"%r\" %>s %O" common
  LogFormat "%{Referer}i -> %U" referer
  LogFormat "%{User-agent}i" agent

  # Include of directories ignores editors and dpkgs backup files,
  # see README.Debian for details.

  # Include generic snippets of statements
  IncludeOptional conf-enabled/*.conf

  # Include the virtual host configurations:
  IncludeOptional sites-enabled/*.conf

  # vim: syntax=apache ts=4 sw=4 sts=4 sr noet
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