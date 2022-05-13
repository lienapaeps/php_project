<?php
    class Like {
        private $projectId;
        private $userId;

        public function getProjectId() {
            return $this->getprojectId;
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
            $statement->bindParam(":projectId", $this->projectId);
            $statement->bindParam(":userId", $this->userId);

            return $statement->execute();
        }
    }