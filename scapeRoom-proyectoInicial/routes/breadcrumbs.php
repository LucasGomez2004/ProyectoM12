<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Inicio', route('dashboard'));
});

Breadcrumbs::for('user-list', function (BreadcrumbTrail $trail) {
    $trail->push('Usuarios', route('user.list'));
});

Breadcrumbs::for('home/user-list', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Lista de Usuarios', route('user.list'));
});

Breadcrumbs::for('calendario', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Calendario', route('calendar.calendar'));
});

Breadcrumbs::for('user-new', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Usuarios', route('user.list'));
    $trail->push('Nuevo Usuario', route('user.new'));
});

Breadcrumbs::for('user-edit', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Usuarios', route('user.list'));
    $trail->push('Editar Usuario');
});

Breadcrumbs::for('user-profile', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Usuarios', route('user.list'));
    $trail->push('Información del Usuario');
});

Breadcrumbs::for('escaperoom-list', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Escape Rooms', route('escaperoom.list'));
});

Breadcrumbs::for('escaperoom-new', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Escape Rooms', route('escaperoom.list'));
    $trail->push('Nuevo Escape Room', route('escaperoom.new'));
});

Breadcrumbs::for('escaperoom-edit', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Escape Rooms', route('escaperoom.list'));
    $trail->push('Editar Escape Room');
});

Breadcrumbs::for('service-list', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Servicios', route('service.list'));
});

Breadcrumbs::for('service-new', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Servicios', route('service.list'));
    $trail->push('Nuevo Servicio', route('service.new'));
});

Breadcrumbs::for('service-edit', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Servicios', route('service.list'));
    $trail->push('Editar Servicio');
});

Breadcrumbs::for('location-list', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Ubicaciones', route('location.list'));
});

Breadcrumbs::for('location-new', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Ubicaciones', route('location.list'));
    $trail->push('Nueva Ubicación', route('location.new'));
});

Breadcrumbs::for('location-edit', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Ubicaciones', route('location.list'));
    $trail->push('Editar Ubicación');
});

Breadcrumbs::for('role-list', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Roles', route('role.list'));
});

Breadcrumbs::for('role-new', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Roles', route('role.list'));
    $trail->push('Nuevo Rol', route('role.new'));
});

Breadcrumbs::for('role-edit', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Roles', route('role.list'));
    $trail->push('Editar Rol');
});

Breadcrumbs::for('reservation-list', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Reservas', route('reservation.list'));
});

Breadcrumbs::for('reservation-new', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Calendario', route('calendar.calendar'));
    $trail->push('Nueva Reserva', route('reservation.new'));
});

Breadcrumbs::for('reservation-edit', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Reservas', route('reservation.list'));
    $trail->push('Editar Reserva');
});

Breadcrumbs::for('profile', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Perfil', route('profile.edit'));
});

Breadcrumbs::for('contact', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Contacto', route('contact'));
});

Breadcrumbs::for('reservation-client', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Reserva', route('client.reserva'));
});

