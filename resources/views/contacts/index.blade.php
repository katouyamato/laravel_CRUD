<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            お問合せ一覧
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-2 flex justify-center">
                    <button class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg"><a href="{{ route('contacts.create') }}">お問合せ 新規登録</a></button><br>
                    </div>
                    <form class="flex justify-center mb-8" method="GET" action={{ route('contacts.index') }}>
                        <input type="text" name="search" placeholder="検索">
                        <button class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">検索する</button>
                    </form>

                    <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                        <table class="table-auto w-full text-left whitespace-no-wrap">
                            <thead>
                            <tr>
                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">No.</th>
                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">氏名</th>
                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">件名</th>
                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">登録日時</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($contacts as $contact)
                            <tr class="hover:bg-slate-300">
                                <td class="border-t-2 border-gray-200 px-4 py-3"><a href="{{ route('contacts.show',['id' => $contact -> id ]) }}">{{ $contact->id }}</a></td>
                                <td class="border-t-2 border-gray-200 px-4 py-3"><a href="{{ route('contacts.show',['id' => $contact -> id ]) }}">{{ $contact->name }}</a></td>
                                <td class="border-t-2 border-gray-200 px-4 py-3"><a href="{{ route('contacts.show',['id' => $contact -> id ]) }}">{{ $contact->title }}</a></td>
                                <td class="border-t-2 border-gray-200 px-4 py-3"><a href="{{ route('contacts.show',['id' => $contact -> id ]) }}">{{ $contact->created_at }}</a></td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $contacts->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
