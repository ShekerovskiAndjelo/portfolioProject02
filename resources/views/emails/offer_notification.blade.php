<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New Offer Notification</title>
</head>
<body>
    <h1>New Offer Available!</h1>
    <p>Dear Subscriber,</p>
    <p>We're excited to inform you about our new offer:</p>

    <h2>Location: {{ $offer->location->country }} , {{ $offer->location->area }} </h2>
    <h2>Accommodation: {{ $offer->accommodation->name }}</h2>
    <h2>Type: {{ $offer->accommodation->type }}</h2>
    <p>Description: {{ $offer->accommodation->description }}</p>
    <p>Transport: {{ $offer->accommodation->transport }}</p>

    <p>Visit our website for more details.</p>
    <p>Thank you!</p>
</body>
</html>
