@component('mail::message')
# Új érdeklődő érkezett

**Név:** {{ $data['name'] }}  
**Email:** {{ $data['email'] }}  
**Tárgy:** {{ $data['subject'] }}

---

{{ $data['message'] }}

@endcomponent
