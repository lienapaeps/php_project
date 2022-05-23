<?php
    class Like {
        private $projectId;
        private $userId;

        public function getProjectId() {
            return $this->projectId;
        }

        public function setProjectId($projectId) {
            $this->projectId = $projectId;
            return $this;
        }

        public function getUserId() {
            return $this->userId;
        }

        public function setUserId($userId) {
            $this->userId = $userId;
            return $this;
        }

        public function save() {
            $conn = DB::getConnection();
            $statement = $conn->prepare("INSERT INTO likes (project_id, user_id, time) VALUES (:projectID, :userId, NOW())");

            $projectId = $this->getProjectId();
            $userId = $this->getUserId();

            $statement->bindValue(":projectId", $projectId);
            $statement->bindValue(":userId", $userId);

            return $statement->execute();
        }

        public function countLikes($projectid) {
            $conn = DB::getConnection();
            $statement = $conn->prepare("SELECT count(*) FROM likes WHERE project_id = :projectId");
            $statement->bindParam(":projectId", $projectid);
            return $statement->execute();
        }
    }