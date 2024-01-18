<?php

session_start();

echo "Version de PHP : " . phpversion() . PHP_EOL; phpinfo();

require_once __DIR__ . '/vendor/autoload.php';
require_once "./Model/Connection.php";
require_once "./Model/UserManager.php";
require_once "./Model/TopicManager.php";
require_once "./Model/CommentManager.php";

$connection = new Connection();
$db = $connection->getDb();


// recuperation info controllers
$ctrl = isset($_GET['ctrl']) && !empty($_GET['ctrl']) ? $_GET['ctrl'] : 'user';
$action = isset($_GET['action']) && !empty($_GET['action']) ? $_GET['action'] : 'display';

// selection manager en fonction du ctrl
$collection_users = $db->selectDatabase('forum')->selectCollection('users');
$userManager = new UserManager($collection_users);
$collection_comments = $db->selectDatabase('forum')->selectCollection('comments');
$commentManager = new CommentManager($collection_comments, $userManager);
$collection_topics = $db->selectDatabase('forum')->selectCollection('topics');
$topicManager = new TopicManager($collection_topics, $userManager, $commentManager);


if ($ctrl === 'user') {$manager = $userManager;}
elseif ($ctrl === 'topic') {$manager = $topicManager;}
else {$manager = $userManager;} // controller par defaut gestion user


$ctrl = ucfirst($ctrl);
require_once('./Controller/'.$ctrl.'Controller.php');
$ctrl = $ctrl.'Controller';

$controller = new $ctrl($manager);
if ($action === 'displayTopicDetails' && isset($_GET['topicId'])) // action speciale (voir un sujet)
{
    $controller->displayTopicDetails($_GET['topicId']);
}
else
{
    $controller->$action();
}


/*// test ajout utilisateur


$userData = ['email' => 'john.doe@example.com','password' => 'securepassword','firstName' => 'John','lastName' => 'Doe','address' => '123 Main St','postalCode' => '12345','city' => 'Cityville','country' => 'Countryland','admin' => false];
$newUser = new User($userData);
$userManager->create($newUser);
*/


/* // extrait authentification
if (
( isset($_GET['ctrl']) && !empty($_GET['ctrl']) ) &&
( isset($_GET['action']) && !empty($_GET['action']) )
) {
$ctrl = $_GET['ctrl'];
$action = $_GET['action'];
}
else {
$ctrl = 'User';
$action = 'display';
}
require_once('./Controller/'.$ctrl .'Controller.php');
$ctrl = $ctrl . 'Controller';
$controller = new $ctrl($db);
$controller->$action();*/
?>
