<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New Airplane Ticket Notification</title>
</head>
<body>
    <h1>New Airplane Ticket Available!</h1>
    <p>Dear {{ $contact->name }},</p>
    <p>We're excited to inform you about your new airplane ticket details:</p>

    <h2>Ticket Details</h2>
    <p>Ticket Type: {{ $ticket->ticket_type }}</p>
    <p>From: {{ $ticket->from_destination }}</p>
    <p>To: {{ $ticket->to_destination }}</p>
    <p>From date: {{ $ticket->from_date }}</p>
    <p>To date: {{ $ticket->to_date }}</p>
    <p>Adults: {{ $ticket->adults }}</p>
    <p>Kids: {{ $ticket->kids }}</p>
    <p>Babies: {{ $ticket->babies }}</p>




    <h2>Contact Information</h2>
    <p>Name: {{ $contact->name }}</p>
    <p>Email: {{ $contact->email }}</p>

    <p>Thank you for choosing our services!</p>
</body>
</html>
