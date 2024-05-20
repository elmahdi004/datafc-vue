<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
<AuthenticationCard>
    <Head title="login" />

    <div v-if="status" className="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
      {{ 
        status
        }}
    </div>

    <form @submit.prevent="submit">
      <div className="mb-8">
        <InputLabel htmlFor="email">Email</InputLabel>
        <TextInput id="email" type="email" className="mt-1 block w-full" v-model="form.email" @change="e => form.setData('email', e.currentTarget.value)" required autoFocus />
        <InputError className="mt-2" :message="form.errors.email" />
      </div>

      <div className="mt-4">
        <InputLabel htmlFor="password">Mot de pass</InputLabel>
        <TextInput id="password" type="password" className="mt-1 block w-full" v-model="form.password" @change="e => form.setData('password', e.currentTarget.value)" required autoComplete="current-password" />
        <InputError className="mt-2" :message="form.errors.password" />
      </div>



      <div className="flex flex-col space-y-2 md:flex-row md:items-center md:justify-between md:space-y-0 mt-4">
        <div className="">
          <label className="flex items-center">
            <Checkbox name="remember" :checked="form.data.remember === 'on'" @change="e => form.setData('remember', e.currentTarget.checked ? 'on' : '')" />
            <span className="ml-2 text-sm text-gray-600 ">
              Gardez-moi connecté
            </span>
          </label>
        </div>
        <div v-if="canResetPassword">

          <Link :href="route('password.request')" className="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-chill-500 dark:focus:ring-offset-primary">
            Mot de passe oublié?
          </Link>
        </div>



      </div>
      <div>
        <PrimaryButton :newClass="['my-5 w-full items-center justify-center  py-3 ',  form.processing ? 'opacity-25' : '' ]" :disabled="form.processing">
        Se connecter
        </PrimaryButton>
      </div>
      <div className="flex items-center justify-center mt-4">
        <Link :href="route('register')" className="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-chill-500 dark:focus:ring-offset-primary">
          Tu n'as pas de compteS'inscrire
        </Link>
      </div>
    </form>
  </AuthenticationCard>
</template>
