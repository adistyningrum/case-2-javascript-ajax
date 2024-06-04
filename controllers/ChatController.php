<?php
require_once '../config/database.php';
require_once '../models/ChatModel.php';

class ChatController {
    private $db;
    private $chatModel;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->chatModel = new ChatModel($this->db);
    }

    public function fetchMessages() {
        $stmt = $this->chatModel->read();
        $messages = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $message_item = [
                "id" => $id,
                "username" => $username,
                "message" => $message,
                "created_at" => $created_at
            ];
            array_push($messages, $message_item);
        }
        echo json_encode($messages);
    }

    public function sendMessage() {
        $data = json_decode(file_get_contents("php://input"));
        $this->chatModel->username = $data->username;
        $this->chatModel->message = $data->message;
        $this->chatModel->created_at = date('Y-m-d H:i:s');

        if($this->chatModel->create()) {
            echo json_encode(["message" => "Message sent."]);
        } else {
            echo json_encode(["message" => "Message could not be sent."]);
        }
    }
}

$controller = new ChatController();

if($_SERVER['REQUEST_METHOD'] === 'GET') {
    $controller->fetchMessages();
} elseif($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->sendMessage();
}
?>
