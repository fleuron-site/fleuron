@component('mail::message')

<table cellpadding="0" cellspacing="0" border="0" class="v1comment_body" style="-webkit-background-clip: padding-box; background-clip: padding-box; border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background: #fff; -webkit-border-radius: 3px; -moz-border-radius: 3px; -ms-border-radius: 3px; -o-border-radius: 3px; border-radius: 3px; padding-bottom: 20px">
	<tbody>
	    <tr>
			<td class="v1comment_body_td" style="column-span: all; -webkit-background-clip: padding-box; background-clip: padding-box; color: #545454; font-family: 'Helvetica Neue',Arial,sans-serif; font-size: 14px; line-height: 20px;  padding: 15px 20px" colspan="3">
				<p style="margin: 10px 0; font-size: 20px; text-align: center">
					Message envoyé par {{ $data['name']}} 
				</p>
				<div style="width: 100%; height: 1px; background: #e4e4e4; margin: 20px 0"></div>
			</td>
		</tr>
		<tr>
			<td style="padding: 5px 5px 5px 20px; vertical-align: top; width: 20%;">
				Email
			</td>
			<td style="width: 5%; min-width: 20px; text-align: center; vertical-align: top; padding: 5px 0">:</td>
			<td style=" padding: 5px 20px 5px 5px; width: 75%; vertical-align: top">
				{{ $data['email']}}
			</td>
		</tr>
		<tr>
			<td style="padding: 5px 5px 5px 20px; vertical-align: top; width: 20%;">
				Téléphone
			</td>
			<td style="width: 5%; min-width: 20px; text-align: center; vertical-align: top; padding: 5px 0">:</td>
			<td style=" padding: 5px 20px 5px 5px; vertical-align: top">
				{{ $data['phone']}}
			</td>
		</tr>
		<tr>
			<td style="padding: 5px 5px 5px 20px; vertical-align: top; width: 20%;">
				Message
			</td>
			<td style="width: 5%; min-width: 20px; text-align: center; vertical-align: top; padding: 5px 0">:</td>
			<td style=" padding: 5px 20px 5px 5px; vertical-align: top">
				{{ $data['message'] }}
			</td>
		</tr>
		<tr>
		    <td style="padding: 5px 5px 5px 20px; vertical-align: top; width: 20%;"></td>
			<td style="width: 5%; min-width: 20px; vertical-align: top; padding: 5px 0"></td>
		    <td style="padding: 5px 20px 5px 5px;vertical-align: top;">
				@component('mail::button', ['url' => 'fleuron.tg'])
    				Cliquez ici pour accéder à fleuron.tg
    			@endcomponent
			</td>
		</tr>
	</tbody>
</table>

@endcomponent

			