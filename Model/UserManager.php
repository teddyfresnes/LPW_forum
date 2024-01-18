<?php

use MongoDB\Collection;
use MongoDB\BSON\ObjectId;

class UserManager
{
    private Collection $collection;

    public function __construct(Collection $collection)
    {
        $this->collection = $collection;
    }

    public function create(User $user)
    {
        $userData = [
            'password' => hash("sha1", $user->getPassword()),
            'email' => $user->getEmail(),
            'firstName' => $user->getFirstName(),
            'lastName' => $user->getLastName(),
            'address' => $user->getAddress(),
            'postalCode' => $user->getPostalCode(),
            'city' => $user->getCity(),
            'country' => $user->getCountry(),
            'admin' => 0,
        ];

        $result = $this->collection->insertOne($userData);

        if ($result->getInsertedCount() > 0) {
            $insertedId = $result->getInsertedId();
            return $insertedId;
        } else {
            return null;
        }
    }

    public function update(User $user)
    {
        $userData = [
            'password' => hash("sha1", $user->getPassword()),
            'email' => $user->getEmail(),
            'firstName' => $user->getFirstName(),
            'lastName' => $user->getLastName(),
            'address' => $user->getAddress(),
            'postalCode' => $user->getPostalCode(),
            'city' => $user->getCity(),
            'country' => $user->getCountry(),
            'admin' => 0,
        ];

        $result = $this->collection->updateOne(
            ['_id' => new ObjectId($user->getId())],
            ['$set' => $userData]
        );

        return $result->getModifiedCount() > 0;
    }

    public function delete(User $user)
    {
        $result = $this->collection->deleteOne(['_id' => new ObjectId($user->getId())]);

        return $result->getDeletedCount() > 0;
    }

    public function findOne(int $id)
    {
        try {
            return $this->collection->findOne(['_id' => new ObjectId($id)]);
        } catch (MongoDB\Driver\Exception\ConnectionTimeoutException $e) {
            echo "Erreur de connexion à la base de données : " . $e->getMessage();
        }
    }

    public function findAll()
    {
        return $this->collection->find()->toArray();
    }

    public function login($email, $password)
    {
        $hashedPassword = hash("sha1", $password);

        return $this->collection->findOne(['email' => $email, 'password' => $hashedPassword]);
    }

    public function findByEmail($email)
    {
        return $this->collection->findOne(['email' => $email]);
    }

    public function getFullNameById($userId)
    {
        $user = $this->collection->findOne(['_id' => new ObjectId($userId)]);

        if ($user)
        {
            return $user['firstName'].' '.$user['lastName'];
        }
        else
        {
            return 'Utilisateur Inconnu';
        }
    }

    public function getDetailsById(string $userId)
    {
        $user = $this->collection->findOne(['_id' => new ObjectId($userId)]);

        if (!$user) {
            return null;
        }

        return [
            'id' => (string) $user['_id'],
            'email' => $user['email'],
            'firstName' => $user['firstName'],
            'lastName' => $user['lastName'],
            'address' => $user['address'],
            'postalCode' => $user['postalCode'],
            'city' => $user['city'],
            'country' => $user['country'],
            'admin' => $user['admin'],
            'createdAt' => $user['createdAt']->toDateTime(),
        ];
    }
}

?>