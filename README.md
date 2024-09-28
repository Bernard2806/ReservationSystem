<img align="right" width="100" height="100" src="https://i.imgur.com/fSjgaVI.jpeg">

### ReservationSystem
###### Institution: Escuela de Educación Secundaria Técnica Nº1 “Mariano Moreno” de Chivilcoy

---

### Description

This repository contains the code for a web page designed to reserve the audiovisual room, dining hall, or auditorium at Escuela Técnica Industrial Nº1 "Mariano Moreno" located in Chivilcoy. The system includes:

- **Login functionality with normal and admin accounts.**
  - **Normal accounts**: Users can make reservations.
  - **Admin accounts**: Administrators can modify reservations and manage other users' data.
- **Reserve spaces for viewing content:** Rooms can be reserved to watch content using a projector or TV (in the case of the dining hall and audiovisual room).
- **Request the projector:** Users can request the projector and specify any room in the school for its use.

### Configuration

To ensure the project functions correctly, create a file named `config_database.php` in the `include` directory with the following code:

```php
<?php
return [
    'db' => [
        'usuario' => 'your_user',
        'clave' => 'your_password',
        'servidor' => 'your_server',
        'basededatos' => 'your_database',
    ],
];
?>
```

### Usage Instructions

1. Clone the repository to your local machine.
2. Create the `config_database.php` file in the `include` directory with your database credentials.
3. Import the database using the `bd.sql` file located at the root of the repository. This file contains all the necessary commands to create the required MySQL database.
4. Upload the project to your web server and ensure the permissions are correct.
5. Access the web page and use the functionalities according to the account type (normal or admin).
