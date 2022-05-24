<?php
    class Like {
        private $projectId;
        private $userId;

        public function getProjectId() {
            return $this->projectId;
        }

        public function setProjectId($projectId) {
            $this->projectId = intval($projectId);
            return $this;
        }

        public function getUserId() {
            return $this->userId;
        }

        public function setUserId($userId) {
            $this->userId = intval($userId);
            return $this;
        }

        public function save() {
            $conn = DB::getConnection();
            $statement = $conn->prepare("insert into likes (time, user_id, project_id) values (:time, :userId, :projectId)");

            $statement->bindValue(":projectId", $this->getProjectId());
            $statement->bindValue(":userId", $this->getUserId());
            $statement->bindValue(":time", $this::getDateTime());

            return $statement->execute();
        }

        public function countLikes($id) {
            $conn = DB::getConnection();
            $statement = $conn->prepare("SELECT COUNT(*) as count_likes from likes where project_id = :projectId");
            $statement->bindValue(":projectId", $id);
            $statement->execute();
            return $statement->fetchColumn();
        }

        public function delete() {
            $conn = DB::getConnection();
            $statement = $conn->prepare("delete from likes where project_id = :projectId and user_id = :userId");
            $statement->bindValue(":projectId", $this->getProjectId());
            $statement->bindValue(":userId", $this->getUserId());
            return $statement->execute();
        }

        private static function getDateTime(){
            $dateTime = new DateTime();
            $dateTime = $dateTime->format('Y-m-d H:i:s');
            return $dateTime;
        }

        public function checkLiked() {
            $conn = DB::getConnection();
            $statement = $conn->prepare("select * from likes where project_id = :projectId and user_id = :userId");
            $statement->bindValue(":projectId", $this->getProjectId());
            $statement->bindValue(":userId", $this->getUserId());
            $statement->execute();
            return $statement->fetchColumn();
        }
    }