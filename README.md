To run the project (make sure you have docker running) run commands in terminal:

./vendor/bin/sail up -d  
./vendor/bin/sail composer install  
./vendor/bin/sail npm install  
./vendor/bin/sail artisan migrate  
./vendor/bin/sail artisan optimize  
./vendor/bin/sail npm run dev
