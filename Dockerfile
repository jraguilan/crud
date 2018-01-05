FROM centos:7
#MAINTAINER Jake Zieve <jjzieve@gmail.com>

# pull the epel and webtatic repos
RUN rpm -Uvh https://dl.fedoraproject.org/pub/epel/epel-release-latest-7.noarch.rpm
RUN rpm -Uvh https://mirror.webtatic.com/yum/el7/webtatic-release.rpm

# install php7 & postgresql-9.4
RUN yum -y update && yum clean all
RUN yum install -y \
	php70w \
	php70w-opcache \
	php70w-xml \
	php70w-mbstring \
	php70w-pdo \
	php70w-pgsql \
	php70w-process \
	postgresql \
	postgresal-contrib ; exit 0

# get symfony and composer (I know, curl pipes, so insecure... go read the script if you're scared of the gov't installing keyloggers)
RUN curl -LsS https://symfony.com/installer -o /usr/local/bin/symfony
RUN chmod a+x /usr/local/bin/symfony
RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer

# install symfony demo 
WORKDIR /var/www/
RUN symfony demo
WORKDIR /var/www/symfony_demo
RUN chmod +x app/console

# expose port 8000 and run the demo via: $ app/console server:run 0.0.0.0:8000
EXPOSE 8000
ENTRYPOINT ["/usr/bin/php"]
CMD ["app/console", "server:run", "0.0.0.0:8000"]