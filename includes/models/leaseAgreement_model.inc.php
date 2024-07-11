<?php

declare(strict_types=1);

function get_apartment_details(object $pdo)
{
    $query = "SELECT * FROM apartments;";

    $stmt = $pdo->prepare($query);

    $stmt->execute();

    $results = $stmt->fetchall(PDO::FETCH_ASSOC);

    return $results;
}

function get_apartment(object $pdo, string $id)
{
    $query = "SELECT * FROM apartments WHERE id = :id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    $results = $stmt->fetch(PDO::FETCH_ASSOC);

    return $results;
}

function send_leaseAgreement_data(
    object $pdo,
    string $apartment_name,
    string $landlord_name,
    string $tenant_name,
    string $apartment_id,
    string $stay_time,
    string $total_amount,
    string $security_deposit
) {
    $query = "INSERT INTO leaseagreement(apartment_name, landlord_name, tenant_name, apartment_id, stay_time, 
        total_amount, security_deposit) 
        VALUES (:apartment_name, :landlord_name, :tenant_name, :apartment_id, :stay_time, 
        :total_amount, :security_deposit);";

    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":apartment_name", $apartment_name);
    $stmt->bindParam(":landlord_name", $landlord_name);
    $stmt->bindParam(":tenant_name", $tenant_name);
    $stmt->bindParam(":apartment_id", $apartment_id);
    $stmt->bindParam(":stay_time", $stay_time);
    $stmt->bindParam(":total_amount", $total_amount);
    $stmt->bindParam(":security_deposit", $security_deposit);

    $stmt->execute();
}

function get_lease_details(object $pdo, string $name)
{
    $query = "SELECT * FROM leaseagreement WHERE tenant_name = :tenant_name;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":tenant_name", $name);
    $stmt->execute();

    $results = $stmt->fetch(PDO::FETCH_ASSOC);

    return $results;
}

function get_rented_details(object $pdo, string $landlord_name)
{
    $query = "SELECT * FROM leaseagreement WHERE landlord_name = :landlord;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":landlord", $landlord_name);
    $stmt->execute();

    $results = $stmt->fetchall(PDO::FETCH_ASSOC);

    return $results;
}
