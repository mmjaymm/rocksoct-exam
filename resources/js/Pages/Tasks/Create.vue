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
  { value: 'todo', text: 'To Do' },
  { value: 'in-progress', text: 'In-progress' },
  { value: 'done', text: 'Done' },
];
const priorityOptions = [
  { value: 'low', text: 'Low' },
  { value: 'medium', text: 'Medium' },
  { value: 'high', text: 'High' },
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

        form.post(route('tasks.store'), {
        onFinish: () => {
            // form.reset('password', 'password_confirmation');
        },
    });
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
                            <h2 class="text-lg font-medium text-gray-900">Create Task</h2>
                        </header>

                        <form  @submit.prevent="submitTask(validateForm)" class="mt-6 space-y-6">
                            <div>
                                <InputLabel for="title" value="Title" />

                                <TextInput
                                    id="title"
                                    ref="taskTitleInput"
                                    v-model="form.title"
                                    type="text"
                                    class="mt-1 block w-full"
                                />

                                <InputError v-if="errors.title" :message="errors.title" class="mt-2" />
                            </div>

                            <div>
                                <InputLabel for="description" value="Description" />

                                <TextInput
                                    id="description"
                                    ref="taslTitleInput"
                                    v-model="form.description"
                                    type="text"
                                    class="mt-1 block w-full"
                                />
                                <InputError v-if="errors.description" :message="errors.description" class="mt-2" />
                            </div>
                            <div>
                                <InputLabel for="status" value="Status" />
                                <SelectInput
                                    id="status"
                                    v-model="form.status"
                                    :options="statusOptions"
                                    placeholder="Choose an option"
                                />
                                <!-- <InputError :message="form.errors.password_confirmation" class="mt-2" /> -->
                            </div>
                            <div>
                                <InputLabel for="priority" value="Priority" />
                                <SelectInput
                                    id="priority"
                                    v-model="form.priority"
                                    :options="priorityOptions"
                                    placeholder="Choose an option"
                                />
                                <!-- <InputError :message="form.errors.password_confirmation" class="mt-2" /> -->
                            </div>
                            <!-- <div>
                                <InputLabel for="dueDate" value="Due Date" />

                                <TextInput
                                    id="due-date"
                                    ref="taskTitleInput"
                                    v-model="form.due_date"
                                    type="date"
                                    class="mt-1 block w-full"
                                />

                                <InputError v-if="errors.title" :message="errors.title" class="mt-2" />
                            </div>
                            <div>
                                <InputLabel for="attachments" value="Attachments" />

                                <TextInput
                                    id="due-date"
                                    ref="taskAttachmentInput"
                                    v-model="form.attachments"
                                    type="file"
                                    @change="handleFileUpload" 
                                    multiple
                                    class="mt-1 block w-full"
                                />

                                <InputError v-if="errors.title" :message="errors.title" class="mt-2" />
                            </div> -->
                            <div class="flex items-center gap-4">
                                <PrimaryButton :disabled="form.processing">Save</PrimaryButton>

                                <Transition
                                    enter-active-class="transition ease-in-out"
                                    enter-from-class="opacity-0"
                                    leave-active-class="transition ease-in-out"
                                    leave-to-class="opacity-0"
                                >
                                    <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Saved.</p>
                                </Transition>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>