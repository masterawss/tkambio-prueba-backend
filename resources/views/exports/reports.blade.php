<table>
    <tr>
        <td colspan="5"></td>
    </tr>
    <tr>
        <td colspan="5" style="background: #4482e7; color: #FFFFFF; font-size: 16px; text-align: center;">
            USERS LIST ({{$users->count()}} results)
        </td>
    </tr>
    <tr>
        <td style="background: #f8af27; color: #FFFFFF; font-size: 13px">ID</td>
        <td style="background: #f8af27; color: #FFFFFF; font-size: 13px">Name</td>
        <td style="background: #f8af27; color: #FFFFFF; font-size: 13px">Birthday</td>
        <td style="background: #f8af27; color: #FFFFFF; font-size: 13px">Email</td>
        <td style="background: #f8af27; color: #FFFFFF; font-size: 13px">Created at</td>
    </tr>
    @foreach ($users as $user)
        <tr>
            <td style="background: #F6F6F6;">{{$user->id}}</td>
            <td style="background: #F6F6F6;">{{$user->name}}</td>
            <td style="background: #F6F6F6;">{{optional($user->birth_date)->format('d/m/Y')}}</td>
            <td style="background: #F6F6F6;">{{$user->email}}</td>
            <td style="background: #F6F6F6;">{{optional($user->created_at)->format('d/m/Y')}}</td>
        </tr>
    @endforeach
</table>
