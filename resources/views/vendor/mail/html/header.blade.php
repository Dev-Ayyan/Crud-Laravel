<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="{{ asset('admin-assets/images/logo.png') }}" class="logo" alt="">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>