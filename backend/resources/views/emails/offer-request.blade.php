<p>Új ajánlatkérés érkezett:</p>
<ul>
    <li>Név: {{ $data['name'] }}</li>
    <li>Email: {{ $data['email'] }}</li>
    <li>Telefonszám: {{ $data['phone'] }}</li>
    <li>Temető (város): {{ $data['cemetery'] }}</li>
    <li>Síremlék alapterülete: {{ $data['area'] }}</li>
    <li>Anyag: {{ $data['material'] }}</li>
    <li>Alsórész (kódszám): {{ $data['base_code'] }}</li>
    <li>Emlék (fejrész, kódszám): {{ $data['head_code'] }}</li>
    <li>Kiegészítők: {{ $data['extras'] }}</li>
    <li>Felirat típusa: {{ $data['inscription_type'] }}</li>
    <li>Sírfelirat: {{ $data['inscription'] }}</li>
    <li>Üzenet: {{ $data['message'] }}</li>
</ul>
