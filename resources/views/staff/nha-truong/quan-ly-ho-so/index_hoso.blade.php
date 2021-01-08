<table class="table table-bordered mt-3">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Họ tên trẻ</th>
        <th scope="col" >Nickname</th>
        <th scope="col" >Địa chỉ</th>
        <th scope="col" >Ngày sinh</th>
        <th scope="col" >Giới tính</th>
        <th scope="col" >Họ tên phụ huynh</th>
        <th scope="col" >Số điện thoại</th>
        <th scope="col" >Email</th>
    </tr>
    </thead>
    <tbody>
    @foreach($posts as $post)
        @if($post->status > 0)
        <tr>
            <th scope="row">{{ $post->id }}</th>
            <td>{{ $post->kid_name }}</td>
            <td>{{ $post->nickname }}</td>
            <td>{{ $post->address }}</td>
            <td>{{ $post->date_of_birth }}</td>
            <td>{{ $post->gender }}</td>
            <td>{{ $post->parent_name }}</td>
            <td>{{ $post->phone }}</td>
            <td>{{ $post->email }}</td>
        </tr>
        @endif
    @endforeach
    </tbody>
</table>
