<!DOCTYPE html>
<html>
<head>
<style>
  body { font-family: Arial, sans-serif; font-size: 13px; margin: 0; padding: 40px; }
  .header { text-align: center; margin-bottom: 20px; }
  .header h3 { margin: 2px 0; font-size: 13px; }
  .header h1 { margin: 4px 0; font-size: 20px; text-transform: uppercase; }
  .divider { border-top: 2px solid #1e1b4b; margin: 12px 0; }
  .title { text-align: center; font-size: 18px; font-weight: bold;
           text-decoration: underline; text-transform: uppercase;
           margin: 20px 0; letter-spacing: 2px; }
  .body-text { text-align: justify; line-height: 1.8; margin: 16px 0; }
  .signature { margin-top: 60px; text-align: center; }
  .sig-name { font-weight: bold; font-size: 15px; text-transform: uppercase; }
  .sig-title { font-size: 12px; }
  .footer-ref { text-align: right; font-size: 10px; color: #666; margin-top: 40px; }
  .or-line { margin-top: 20px; font-size: 12px; }
</style>
</head>
<body>

<div class="header">
  <h3>Republic of the Philippines</h3>
  <h3>Province of {{ $config['province'] }} • Municipality of {{ $config['municipality'] }}</h3>
  <h1>Barangay {{ $config['barangay_name'] }}</h1>
  <h3>Office of the Punong Barangay</h3>
</div>

<div class="divider"></div>

<div class="title">
  Certificate of
  @switch($cert->certificate_type)
    @case('clearance') Clearance @break
    @case('indigency') Indigency @break
    @case('residency') Residency @break
    @case('barangay-id') Barangay ID @break
    @case('ftjs') First Time Job Seeker @break
    @default Clearance
  @endswitch
</div>

<p><strong>TO WHOM IT MAY CONCERN:</strong></p>

<div class="body-text">
  <p>
    This is to certify that <strong>{{ strtoupper($cert->full_name) }}</strong>,
    of legal age, {{ $cert->civil_status }}, Filipino citizen, and a bonafide
    resident of {{ $cert->address }}, Barangay {{ $config['barangay_name'] }},
    {{ $config['municipality'] }}, {{ $config['province'] }}, Philippines,
    is personally known to this office and is a person of good moral character
    and has no derogatory record filed in this office as of this date.
  </p>
  <p>
    This certification is issued upon the request of the above-named person
    for the purpose of <strong>{{ $cert->purpose }}</strong>.
  </p>
  <p>
    Issued this {{ now()->format('jS') }} day of {{ now()->format('F Y') }}
    at Barangay {{ $config['barangay_name'] }}, {{ $config['municipality'] }},
    {{ $config['province'] }}, Philippines.
  </p>
</div>

<div class="or-line">OR No.: _______________________</div>

<div class="signature">
  <div class="sig-name">{{ $config['captain_name'] }}</div>
  <div class="sig-title">Punong Barangay</div>
</div>

<div class="footer-ref">
  Reference No.: {{ $cert->reference_number }} |
  Date Filed: {{ $cert->created_at->format('M d, Y') }}
</div>

</body>
</html>