<script setup lang="ts">
import { ref } from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import SelectInput from '@/Components/SelectInput.vue';

const form = useForm({
    id: '',
    title: '',
    description: '',
    status : '',
    priority : '',
    due_date : '',
    attachments : [] as File [] | null,
});

const statusOptions = [
  { value: '1', text: 'To Do' },
  { value: '2', text: 'In-progress' },
  { value: '3', text: 'Done' },
];
const priorityOptions = [
  { value: '0', text: 'Low' },
  { value: '1', text: 'Medium' },
  { value: '2', text: 'High' },
];

const errors = ref<{ title?: string; description?: string; status?: string }>({});
const validateForm = () => {
  errors.value = {};
  let isValid = true;

   // Validate title
   if (!form.title) {
        errors.value.title = 'Title is required.';
        isValid = false;
      }

      // Validate description
      if (!form.description) {
        errors.value.description = 'Description is required.';
        isValid = false;
      }

  return isValid;
};

const handleFileUpload = (event: Event) => {
      const input = event.target as HTMLInputElement;
      if (input.files) {
        form.attachments = Array.from(input.files);
      }
    };


const submitTask = (validateForm: () => boolean) => {

    if (validateForm()) {
        console.log('Form submitted:', form);
      } else {
        console.log('Validation errors:', errors.value);
      }
};

</script>

<template>
    <Head title="Create Tasks" />

    <AuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">Users List</h2>
                        </header>

                        <table class="table-auto">
                            <thead>
                                <tr>
                                <th>Song</th>
                                <th>Artist</th>
                                <th>Year</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <td>The Sliding Mr. Bones (Next Stop, Pottersville)</td>
                                <td>Malcolm Lockyer</td>
                                <td>1961</td>
                                </tr>
                                <tr>
                                <td>Witchy Woman</td>
                                <td>The Eagles</td>
                                <td>1972</td>
                                </tr>
                                <tr>
                                <td>Shining Star</td>
                                <td>Earth, Wind, and Fire</td>
                                <td>1975</td>
                                </tr>
                            </tbody>
                        </table>
                    </section>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>