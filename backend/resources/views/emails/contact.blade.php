@component('mail::message')
# Új ajánlatkérés érkezett

**Név:** {{ $data['name'] }}  
**Email:** {{ $data['email'] }}  
**Tárgy:** {{ $data['subject'] }}

---

{{ $data['message'] }}

@endcomponent
