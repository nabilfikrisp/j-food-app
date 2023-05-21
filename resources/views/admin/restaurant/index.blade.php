@extends('admin.layouts.admin-app')
@section('admin-main')
    <div class="relative flex h-full w-full flex-col items-center justify-center py-10 text-2xl font-semibold">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y-2 divide-gray-200 rounded-lg bg-white text-sm">
                <thead class="ltr:text-left rtl:text-right">
                    <tr>
                        <th class="whitespace-nowrap px-4 py-2 font-semibold text-gray-900">
                            Name
                        </th>
                        <th class="whitespace-nowrap px-4 py-2 font-semibold text-gray-900">
                            Address
                        </th>
                        <th class="whitespace-nowrap px-4 py-2 font-semibold text-gray-900">
                            Rating
                        </th>
                        <th class="whitespace-nowrap px-4 py-2 font-semibold text-gray-900">
                            Price Start
                        </th>
                        <th class="px-4 py-2"></th>
                        <th class="px-4 py-2"></th>
                        <th class="px-4 py-2"></th>
                    </tr>
                </thead>
                @foreach ($restaurants as $restaurant)
                    <tbody class="divide-y divide-gray-200 font-medium">
                        <tr>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-900">
                                {{ $restaurant['name'] }}
                            </td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $restaurant['address'] }}</td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $restaurant['rating'] }}</td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $restaurant['price_start'] }}</td>
                            <td class="whitespace-nowrap px-4 py-2">
                                <a class="inline-block rounded bg-indigo-600 px-4 py-2 text-xs font-medium text-white hover:bg-indigo-700"
                                   href="#">
                                    View
                                </a>
                            </td>
                            <td class="whitespace-nowrap px-4 py-2">
                                <a class="inline-block rounded bg-yellow-600 px-4 py-2 text-xs font-medium text-white hover:bg-indigo-700"
                                   href="#">
                                    Edit
                                </a>
                            </td>
                            <td class="whitespace-nowrap px-4 py-2">
                                <a class="inline-block rounded bg-pink-600 px-4 py-2 text-xs font-medium text-white hover:bg-indigo-700"
                                   href="#">
                                    Delete
                                </a>
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
        <a class="absolute top-10 left-8 rounded-md bg-green-500 px-4 py-2 text-sm font-medium text-white hover:bg-green-600"
       href="{{ route('admin.restaurant.create') }}">Create Restaurant</a>
    </div>
@endsection
