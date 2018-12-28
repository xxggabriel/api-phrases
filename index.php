<?php 

require_once "vendor/autoload.php";

use App\View;
$app = new \Slim\Slim;


$app->group('/api', function() use ($app){
    
    $app->group('/v1', function() use ($app){

                // Get all phrases
                $app->get('/phrases', function () {
                    
                    View::getAllPhrases();
                    
                });

                // Get phrase by id
                $app->get('/phrases/:id', function ($id) {
                    
                    View::getPhrase($id);
                    
                });
        
                // Set phrase by variable $_GET
                $app->get('/phrase', function () {
                    
                    View::setPhrase($_GET);
                    
                });

                $app->put('/phrases/:id', function ($id) {
                    
                    View::setPhrases($id);
                    
                });


                $app->delete('/phrase/:id', function ($id) {
                    View::deletePhrase($id);
                    
                });
    });
});

$app->run();


