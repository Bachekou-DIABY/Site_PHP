<?php

class User
{
    public const NAME_MAX_LENGTH = 20;

    public const AGE_MIN_VAL = 18;

    public const PASSWORD_MIN_LENGTH = 6;

    private $first_name;

    private $last_name;

    private $birthDate;

    private $email;

    private $password;

    public function setFirstName(string $first_name)
    {
        if (strlen($first_name) > self::NAME_MAX_LENGTH) {
            // PHP implémente nativement certaines exceptions, autant les utiliser
            throw new LengthException('La propriété name ne peut excéder %s caractères', self::NAME_MAX_LENGTH);
        }

        if (!ctype_alpha($first_name)) {
            throw new InvalidContentTypeException('La propriété name ne peut contenir que des lettres');
        }

        $this->first_name = $first_name;
    }

    public function setLastName(string $last_name)
    {
        if (strlen($last_name) > self::NAME_MAX_LENGTH) {
            // PHP implémente nativement certaines exceptions, autant les utiliser
            throw new LengthException('La propriété name ne peut excéder %s caractères', self::NAME_MAX_LENGTH);
        }

        if (!ctype_alpha($last_name)) {
            throw new InvalidContentTypeException('La propriété name ne peut contenir que des lettres');
        }

        $this->last_name = $last_name;
    }

    public function setBirthDate(string $birthDate)
    {
        if (!date_create($birthDate)) {
            throw new InvalidDateTimeException('La date de naissance n\'a pas pu être identifiée');
        }

        $birthDate = date_create($birthDate);
        $now = date_create();

        if ($birthDate > $now) {
            throw new InvalidDateTimeException('La date de naissance ne peut se situer dans le futur');
        }

        if (date_diff($birthDate, $now)->y < self::AGE_MIN_VAL) {
            throw new InvalidDateTimeException('Vous devez être majeur pour valider ce formulaire');
        }

        $this->birthDate = $birthDate;
    }

    public function setEmail(string $email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidContentTypeException('La propriété email est invalide');
        }

        $this->email = $email;
    }

    public function setPassword(string $password)
    {
        if (strlen($password) < self::PASSWORD_MIN_LENGTH) {
            throw new LengthException('La propriété password ne peut excéder %s caractères', self::PASSWORD_MIN_LENGTH);
        }

        if (!ctype_alnum($password)) {
            throw new InvalidContentTypeException('La propriété password ne peut contenir que des lettres ou des chiffres');
        }

        $this->password = $password;
    }

    public function isFull()
    {
        return !empty($this->name) && !empty($this->password) && !empty($this->birthDate) && !empty($this->email);
    }
}
