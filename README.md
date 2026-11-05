# Database-Driven Client-Server Application

## Overview

This project expands on the previous Client-Server Application developed for SWE-4633 (Cloud Software Development). The application introduces cloud-based database integration, user authentication, and improved data security.

The application replaces previously hardcoded data and processes with a cloud-hosted database. Users can retrieve information stored in the database, submit and update information, and log in through an authentication system using OpenID Connect (OIDC).

The project demonstrates the development and deployment of a more complete client-server application using cloud infrastructure.

## Features

- **Cloud Database Integration:** Uses a cloud-hosted database to store and retrieve application data.
- **Dynamic Data Retrieval:** Displays information retrieved from the database instead of relying on hardcoded values.
- **Data Submission and Updates:** Allows users to submit and update information stored in the database.
- **Input Sanitization:** Implements client-side and server-side input validation and sanitization to help protect against malicious or invalid data.
- **User Authentication:** Implements a login system using OpenID Connect (OIDC), built on OAuth 2.0.
- **Personalized User Experience:** Displays personalized information, such as the logged-in user's name, throughout the application.
- **Cloud Deployment:** Builds upon the previous Azure-hosted application with additional cloud services.

## Technologies Used

| Technology | Purpose |
|---|---|
| HTML | Client-side page structure |
| CSS | Styling and layout |
| JavaScript | Client-side functionality and input validation |
| PHP | Server-side application logic |
| Cloud Database | Persistent data storage and retrieval |
| OpenID Connect (OIDC) | User authentication |
| OAuth 2.0 | Authorization framework underlying OIDC |
| Microsoft Azure | Cloud hosting and infrastructure |

## Application Workflow

1. The user accesses the web application.
2. The application retrieves and displays information stored in the cloud database.
3. The user can submit or update information through the application.
4. Client-side validation and sanitization help ensure submitted data meets expected requirements.
5. The server performs additional validation and sanitization before processing the data.
6. Users authenticate through the OpenID Connect login system.
7. Once authenticated, the application displays personalized information associated with the logged-in user.
8. Application data is stored and retrieved through the cloud database.

## Security Features

- Client-side input validation and sanitization.
- Server-side input validation and sanitization.
- OpenID Connect authentication.
- OAuth 2.0-based authentication and authorization flows.
- Database-backed application data management.

## Deployment

The application builds upon the previous assignment's Microsoft Azure deployment.

Cloud infrastructure is used to host the application and database, allowing the client and server to communicate with remotely hosted resources.

## Learning Objectives

This project provided practical experience with:

- Integrating cloud-hosted databases into web applications.
- Replacing hardcoded data with dynamic database operations.
- Implementing Create, Read, Update, and Retrieve operations.
- Understanding client-side and server-side data sanitization.
- Implementing authentication using OpenID Connect.
- Understanding the relationship between OAuth 2.0 and OpenID Connect.
- Personalizing applications based on authenticated users.
- Expanding and deploying client-server applications using cloud infrastructure.

## Course

**SWE-4633 – Cloud Software Development**

**Assignment 3:** Database Integration and User Authentication

## License

This project was developed for educational and academic purposes.
