@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://egspgroup.in/mailLogo.png" class="logo" alt="Bumble Bees">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
