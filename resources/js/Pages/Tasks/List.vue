<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import Badge from '@/Components/Tasks/StatusBadge.vue';
import PriorityLevelBadge from '@/Components/Tasks/PriorityLevelBadge.vue';
import axios from 'axios';

defineProps({
    tasks: {
        type: Array,
        default: () => [],
    },
});

const statusColor = (status: string) => {
    switch (status) {
        case 'todo':
            return 'gray';
        case 'in-progress':
            return 'yellow';
        case 'done':
            return 'green';
    }
}

const priorityLevelColor = (level: string) => {
    switch (level) {
        case 'low':
            return 'red-100';
        case 'medium':
            return 'red-400';
        case 'high':
            return 'red-800';
    }
}
</script>

<template>
    <Head title="Tasks" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Task List</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                    <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
                        <thead>
                            <tr class="bg-gray-100 text-gray-600 uppercase text-sm">
                                <th class="py-3 px-6 text-left">Title</th>
                                <th class="py-3 px-6 text-left">Description</th>
                                <th class="py-3 px-6 text-left">Status</th>
                                <th class="py-3 px-6 text-left">Priority Level</th>
                                <th class="py-3 px-6 text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                                <tr v-for="task in tasks" class="border-b border-gray-200 hover:bg-gray-100" :key="task.id">
                                    <td class="py-4 px-6">{{ task.title }}</td>
                                    <td class="py-4 px-6">{{ task.description }}</td>
                                    <td class="py-4 px-6">
                                        <Badge :color="statusColor(task.status)" :text="task.status"/>
                                    </td>
                                    <td class="py-4 px-6">
                                        <PriorityLevelBadge :bgColor="priorityLevelColor(task.priority_level)" :text="task.priority_level"/>
                                    </td>
                                    <td class="py-4 px-6">
                                        <!-- <a href="{{ route('tasks.show', ) }}" class="text-blue-500 hover:text-blue-700">View</a>
                                        <a href="{{ route('tasks.edit', $task) }}" class="ml-4 text-yellow-500 hover:text-yellow-700">Edit</a>
                                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="ml-4 text-red-500 hover:text-red-700">Delete</button>
                                        </form> -->
                                    </td>
                                </tr>
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
