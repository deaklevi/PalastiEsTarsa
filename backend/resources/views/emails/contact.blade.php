<!-- resources/views/emails/new-contact.blade.php -->
<!DOCTYPE html>
<html lang="hu">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Új érdeklődő érkezett</title>
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
      Új érdeklődő érkezett
    </div>
    <div class="email-body">
      <p>Egy új érdeklődő vette fel velünk a kapcsolatot. Az alábbiakban találhatók a részletek:</p>

      <div class="panel">
        <p><strong>Név:</strong> {{ $data['name'] }}</p>
        <p><strong>Email:</strong> {{ $data['email'] }}</p>
        <p><strong>Tárgy:</strong> {{ $data['subject'] }}</p>
      </div>

      <p><strong>Üzenet:</strong></p>
      <div class="panel">
        {{ $data['message'] }}
      </div>

      <p>Kérjük, vegyék fel a kapcsolatot az érdeklődővel a lehető leghamarabb.</p>
    </div>
    <div class="email-footer">
      © {{ date('Y') }} Palásti és Társa Kft. Minden jog fenntartva.
    </div>
  </div>
</body>
</html>
