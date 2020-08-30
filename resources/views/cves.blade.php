<ul>

@foreach ($cve as $cves)
<li>$cve.information</li>
<li>$cve.link</li>
<li>$cve.created_at</li>
@endforeach
</ul>