<!-- resources/views/emails/offer-confirm.blade.php -->
<!DOCTYPE html>
<html lang="hu">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ajánlatkérés visszaigazolás</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f9f9f9;
      margin: 0;
      padding: 0;
      color: #333;
    }
    .email-container {
      max-width: 600px;
      margin: 40px auto;
      background-color: #ffffff;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      border-top: 6px solid #f97316; /* narancssárga kiemelés */
    }
    .email-header {
      background-color: #f97316;
      color: #ffffff;
      text-align: center;
      padding: 20px 30px;
      font-size: 24px;
      font-weight: bold;
    }
    .email-body {
      padding: 30px;
      line-height: 1.6;
      font-size: 16px;
    }
    .email-body p {
      margin: 15px 0;
    }
    .email-body strong {
      color: #111827;
    }
    .panel {
      padding: 15px;
      background-color: #f9fafb;
      border-left: 4px solid #f97316;
      border-radius: 4px;
      margin: 10px 0;
    }
    .email-body ul {
      list-style: none;
      padding: 0;
      margin: 0;
    }
    .email-body li {
      margin-bottom: 10px;
      padding: 10px;
      background-color: #f3f4f6;
      border-radius: 4px;
    }
    .footer {
      padding: 20px 30px;
      background-color: #f3f4f6;
      font-size: 14px;
      color: #555;
      text-align: center;
    }
  </style>
</head>
<body>
  <div class="email-container">
    <div class="email-header">
      Ajánlatkérés Visszaigazolás
    </div>
    <div class="email-body">
      <p>Tisztelt {{ $data['name'] }}!</p>

      <p>Köszönjük, hogy felvette velünk a kapcsolatot.</p>

      <p>Megkaptuk az ajánlatkérést, és hamarosan válaszolni fogunk.</p>

      <p>Az Ön által megadott adatok:</p>
      <ul>
        <li><strong>Név:</strong> {{ $data['name'] }}</li>
        <li><strong>Email:</strong> {{ $data['email'] }}</li>
        <li><strong>Telefonszám:</strong> {{ $data['phone'] }}</li>
        <li><strong>Temető (város):</strong> {{ $data['cemetery'] }}</li>
        <li><strong>Síremlék alapterülete:</strong> {{ $data['area'] }}</li>
        <li><strong>Anyag:</strong> {{ $data['material'] }}</li>
        <li><strong>Alsórész (kódszám):</strong> {{ $data['base_code'] }}</li>
        <li><strong>Emlék (fejrész, kódszám):</strong> {{ $data['head_code'] }}</li>
        <li><strong>Kiegészítők:</strong> {{ $data['extras'] }}</li>
        <li><strong>Felirat típusa:</strong> {{ $data['inscription_type'] }}</li>
        <li><strong>Sírfelirat:</strong> {{ $data['inscription'] }}</li>
        <li><strong>Üzenet:</strong> {{ $data['message'] }}</li>
      </ul>

      <p>Üdvözlettel,<br>
      <strong>Palásti és Társa Kft.</strong></p>
    </div>
    <div class="footer">
      © {{ date('Y') }} Palásti és Társa Kft. Minden jog fenntartva.
    </div>
  </div>
</body>
</html>
