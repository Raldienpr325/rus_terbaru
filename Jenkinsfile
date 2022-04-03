pipeline
{
    agent any

    stages
    {
        stage('Build Application')
        {
            steps
            {
                // ENV PREPARATION
                sh "cp .env.testing .env"

                // Update Dependency
                echo "-- COMPOSER INSTALL --"
                sh "composer install"
                echo "-- END COMPOSER INSTALL"

                // PHP ARTISAN KEY
                sh "php artisan key:gen"

                // NPM INSTALL RAM SERVER
                // echo "-- NPM INSTALL && TEST --"
                // sh "npm install"
                // sh "npm run dev"
                // echo "-- END NPM INSTALL --"
            }
        }
        stage('Code Analysis')
        {
            steps {
               // TEST PHP MESS DETECTOR
               echo "-- PHPMD CHECK --"
               sh "./vendor/bin/phpmd app ansi phpmd-ruleset.xml"
               echo "-- END PHPMD CHECK --"

               // TEST PHP CODE SNIFFER
               echo "-- PHPMD CHECK --"
               sh "./vendor/bin/phpcs"
               echo "-- END PHPMD CHECK --"

               // BEGIN
               echo "-- RUN UNIT TEST --"
               echo "-- END UNIT TEST --"
            }
        }
        stage('Deploy to Staging') {
            when {
                branch "development"
            }
            steps {
                // Deploy to Staging
                sh 'ssh -o StrictHostKeyChecking=no webmaster@staging.imaginecreative.co.id "cd /var/www/web-apps/simple; \
	                git pull; \
 	                git pull origin development; \
 	                composer install; \
                    npm run dev; \
 	                php artisan migrate --force; \
 	                php artisan cache:clear; \
 	                php artisan config:cache; \
                "'
            }
        }
        stage('Deploy to Production') {
            when {
                branch "master"
            }
            steps {
                // Deploy to Development
                echo "DEPLOY TO PRODUCTION SERVER"
            }
        }
    }
}
