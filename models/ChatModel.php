<?php
class ChatModel {
    private $conn;
    private $table_name = "messages";

    public $id;
    public $username;
    public $message;
    public $created_at;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET username=:username, message=:message, created_at=:created_at";
        $stmt = $this->conn->prepare($query);

        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->message = htmlspecialchars(strip_tags($this->message));
        $this->created_at = htmlspecialchars(strip_tags($this->created_at));

        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":message", $this->message);
        $stmt->bindParam(":created_at", $this->created_at);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>
