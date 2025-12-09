<!DOCTYPE html>
<html lang="hu">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Üzenet visszaigazolás</title>
  <style>
    body {
      font-family: 'Arial', sans-serif;
      background-color: #f9f9f9;
      color: #333;
      margin: 0;
      padding: 0;
    }
    .email-container {
      max-width: 600px;
      margin: 40px auto;
      background-color: #ffffff;
      border-radius: 8px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      overflow: hidden;
      border-top: 6px solid #f97316; /* narancssárga kiemelés */
    }
    .email-header {
      padding: 20px 30px;
      background-color: #f97316;
      color: #ffffff;
      text-align: center;
      font-size: 24px;
      font-weight: bold;
    }
    .email-body {
      padding: 30px;
      line-height: 1.6;
      font-size: 16px;
    }
    .email-body h2 {
      color: #111827;
      margin-top: 0;
    }
    .email-body p {
      margin: 15px 0;
    }
    .email-body strong {
      color: #111827;
    }
    .email-footer {
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
      Palásti és Társa Kft.
    </div>
    <div class="email-body">
      <h2>Tisztelt {{ $data['name'] }}!</h2>

      <p>Köszönjük, hogy felvette velünk a kapcsolatot.</p>

      <p>Megkaptuk az üzenetét, és munkatársaink hamarosan válaszolni fognak Önnek.</p>

      <p><strong>Tárgy:</strong> {{ $data['subject'] }}</p>

      <p><strong>Üzenete:</strong></p>
      <p style="padding: 15px; background-color: #f9fafb; border-left: 4px solid #f97316; border-radius: 4px;">
        {{ $data['message'] }}
      </p>

      <br>

      <p>Üdvözlettel,<br>
      <strong>Palásti és Társa Kft.</strong></p>
    </div>
    <div class="email-footer">
      © {{ date('Y') }} Palásti és Társa Kft. Minden jog fenntartva.
    </div>
  </div>
</body>
</html>
