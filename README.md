# Shangri-La Petition Platform (SLPP)

## Repository

This repository contains the implementation of the **Shangri-La Petition Platform (SLPP)**, a web-based petition system developed using **PHP and Laravel**. The platform allows citizens of the fictional country of Shangri-La to participate in parliamentary discussions by creating and signing petitions. It also provides a dedicated interface for the Petitions Committee to manage petitions, configure signature thresholds, and publish responses. The project includes both the main **web application** and a **REST API** for providing petition data.

> ⚠️ Academic Integrity Notice ⚠️
>
> This repository is intended for reference and learning purposes only. If you are a student working on the same or a similar coursework assignment, do not copy, reproduce, or submit any part of this project as your own work. Using this repository to understand concepts, explore implementation approaches, or learn from the code is different from submitting copied work. You are responsible for producing your own independent solution and following your institution's academic integrity and plagiarism policies.

## Assignment

This project was developed as part of the **Mobile and Web Applications** module, which I completed while a student at the University of Leicester. The assignment required developing the Shangri-La Petition Platform (SLPP). The purpose of the platform was to give citizens a way to influence parliamentary discussion through petitions.

The required system was based on the following workflow:

1. A citizen registers as a petitioner.
2. The petitioner creates a petition on a matter within the government's responsibility.
3. Other citizens can view and sign open petitions.
4. When a petition reaches the signature threshold set by the Petitions Committee, it qualifies for parliamentary debate.
5. The Petitions Committee responds on behalf of Parliament.
6. The petition is then closed and no longer accepts new signatures.

The assignment allowed the application to be developed as a web application, mobile application, or hybrid application. Laravel was one of the frameworks explicitly permitted by the coursework specification.

## Main Features

### Petitioner

Registered petitioners can:

* Create an account using their personal details and BioID.
* Sign in and sign out.
* Create new petitions.
* View available petitions.
* View petition details and status.
* Sign open petitions.
* View responses to closed petitions.

The system also enforces rules such as allowing a petitioner to sign a particular petition only once and preventing signatures from being revoked.

### Petitions Committee

The Petitions Committee has a separate dashboard where the committee officer can:

* View all petitions.
* View the number of signatures for each petition.
* Set the signature threshold.
* Identify petitions that have reached the required threshold.
* Respond on behalf of Parliament.
* Close petitions after a response has been submitted.

---

## Overview

This repository contains the implemented solution for the coursework specification. It demonstrates a complete Laravel-based web application featuring database-backed functionality, security controls, and an Open Data REST API for public access.

### Purpose & Key Features

* **User Authentication & Authorization:** Secure user login, session handling, and role-based access control.
* **Petition Management:** Workflow for creating, viewing, managing, and signing petitions.
* **Committee Administration:** Management tools tailored for committee administrative actions.
* **REST API Integration:** Exposes petition data to the public, media, and external organizations.

## Project Structure & Architecture

The application follows standard Laravel conventions to maintain a clean separation of concerns:

| Component | Responsibility |
| --- | --- |
| **Routes** | Defines web and API endpoints |
| **Controllers** | Handles business logic and request processing |
| **Models** | Manages database interactions and ORM logic |
| **Views** | Renders the HTML frontend UI |
| **Migrations** | Version-controls database schema structure |

> **Note:** Development emphasis was placed on secure authentication, robust input validation, secure session management, and adherence to clean application architecture.

## Technology Stack

* **Backend Framework:** PHP & Laravel
* **Database:** MySQL (Relational Database)
* **Frontend:** HTML, CSS, JavaScript
* **API Architecture:** RESTful Endpoints

---

## REST API Documentation

The Open Data REST API allows public access to petition information via standard HTTP request methods.

### Endpoints

`GET /slpp/petitions`

> Retrieves details for all petitions stored in the system.

`GET /slpp/petitions?status=open`

> Filters and retrieves details only for currently active/open petitions.

### Response Data Schema

Successful API responses return a structured JSON object containing:

* **ID:** Unique petition identifier
* **Title & Text:** Petition headline and body content
* **Status:** Current state (e.g., open, closed, under review)
* **Petitioner:** Information about the creator
* **Signatures:** Total count of verified signatures
* **Response:** Official committee/government response details

---

## Getting Started

Installation and configuration instructions for running the project locally are provided in the sections below.

### Requirements

Before running the project, ensure the following are installed:

* PHP
* Composer
* Laravel
* MySQL
* Node.js and npm (if required by the frontend assets)

### Installation

Clone the repository and install the project dependencies:

```bash
git clone <repository-url>
cd <project-directory>

composer install
npm install
```

Create the environment file:

```bash
cp .env.example .env
```

Generate the Laravel application key:

```bash
php artisan key:generate
```

Configure the database connection in `.env`, then run the database migrations:

```bash
php artisan migrate
```

Finally, start the development server:

```bash
php artisan serve
```

The application will then be available through the local Laravel development server.


