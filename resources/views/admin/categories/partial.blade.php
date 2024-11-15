@foreach ($categories as $category)
<ul>
    <li>
        <a href="{{route("admin.category.show",[$category->id])}}">
            id : {{$category->id}}
        </a>
    </li>
    <li>title : {{$category->title}}</li>
    <li>parent : {{$category->parentTitle}}</li>
    <li>description : {{$category->description}}</li>
    ------------------
    <ul>
        <li>
            <strong>
                child : @includeWhen(!empty($category->child),'admin.categories.partial',['categories'=>$category->child])
            </strong>
        </li>
    </ul>
</ul>
<form class="mt-6" action="/admin/category/delete/{{$category->id}}" method="POST">
    @csrf
    <button class="text-sm text-red-500">Delete</button>
</form>
<form class="mt-6" action="/admin/category/{{$category->id}}/edit" method="GET">
    <button class="text-sm text-blue-500">Edit</button>
</form>
<hr>
@endforeach