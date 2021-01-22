@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col col-md-4">
            <nav class="panel panel-default">
                <div class="panel-heading">フォルダ</div>
                <div class="panel-body">
                    <a href="{{ route('folders.create') }}" class="btn btn-default btn-block">
                        フォルダを追加する
                    </a>
                </div>
                <div class="list-group">
                    @foreach ($folders as $folder)
                    <a href="{{ route('tasks.index', ['folder' => $folder]) }}" class="list-group-item {{ ($current_folder_id == $folder->id) ? 'active' : '' }}">{{ $folder->title }}</a>
                    @endforeach
                </div>
            </nav>
        </div>
        <div class="column col-md-8">
            <!-- ここにタスクが表示される -->
            <div class="panel panel-default">
                <div class="panel-heading">タスク</div>
                <div class="panel-body">
                    <div class="text-right">
                        <a href="{{ route('tasks.create', ['folder' => $current_folder_id]) }}" class="btn btn-default btn-block">
                            タスクを追加する
                        </a>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>タイトル</th>
                            <th>状態</th>
                            <th>期限</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                        <tr>
                            <td>{{ $task->title }}</td>
                            <td>
                                <span class=" label {{ $task->status_class }}">{{ $task->status_label }}</span>
                            </td>
                            <td>{{ $task->due_date }}</td>
                            <td>
                                <a href="{{ route('tasks.edit', ['folder' => $current_folder_id, 'task' => $task]) }}" class="btn btn-primary btn-xs">編集</a>
                            </td>
                            <td>
                                <form id="task{{ $task->id }}-form" action="{{ route('tasks.delete', ['folder' => $current_folder_id, 'task' => $task]) }}" method="POST">
                                    @csrf
                                    <a id="task{{ $task->id }}" href="#" class="btn btn-danger btn-xs" onclick="deleteTask(this);">削除</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function deleteTask(e) {
        if (confirm('削除します。よろしいですか？')) {
            document.getElementById(e.id + '-form').submit();
        }
    }
</script>
@endsection