<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';


const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <AuthenticationCard>
      <Head title="Register"/>

      <form onSubmit={onSubmit}>
        <div>
          <InputLabel for="name">Nom</InputLabel>
          <TextInput id="name" type="text" class="mt-1 block w-full" :value="form.data.name" required autoFocus autoComplete="name"/>
          <InputError class="mt-2" :message="form.errors.name"/>
        </div>
        <div class="mt-4">
          <InputLabel for="email">Email</InputLabel>
          <TextInput id="email" type="email" :class="['mt-1 block w-full', form.data.email ? 'border-red-500 text-red-900 placeholder-red-700  focus:ring-red-500 focus:border-red-500' : '']" :value="form.data.email"  required/>
          <InputError class="mt-2" message="form.errors.email"/>
        </div>
        <div class="mt-4">
          <InputLabel for="tel">Tél</InputLabel>
          <TextInput id="tel" type="text" name="telephone" :class="['mt-1 block w-full', form.data.email ? 'border-red-500 text-red-900 placeholder-red-700  focus:ring-red-500 focus:border-red-500' : '']"  :value="form.data.tel" autoComplete="telephone"/>
          <InputError class="mt-2" message="form.errors.tel"/>
        </div>

        <div class="mt-4">
          <InputLabel for="password">Mote de passe</InputLabel>
          <TextInput id="password" type="password" class="mt-1 block w-full" :value="form.data.password" required autoComplete="new-password"/>
          <InputError class="mt-2" :message="form.errors.password"/>
        </div>

        <div class="mt-4">
          <InputLabel for="password_confirmation">
            Confirme Mote de passe
          </InputLabel>
          <TextInput id="password_confirmation" type="password" class="mt-1 block w-full" value="form.data.password_confirmation"  required autoComplete="new-password"/>
          <InputError class="mt-2" message="form.errors.password_confirmation"/>
        </div>

        <!-- {page.props.jetstream.hasTermsAndPrivacyPolicyFeature && (<div class="mt-4">
            <InputLabel for="terms">
              <div class="flex items-center">
                <Checkbox name="terms" id="terms" checked={form.data.terms} onChange={e => form.setData('terms', e.currentTarget.checked)} required/>

                <div class="ml-2">
                  I agree to the
                  <a target="_blank" href={route('terms.show')} class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500 dark:focus:ring-offset-primary">
                    Terms of Service
                  </a>
                  and
                  <a target="_blank" href={route('policy.show')} class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500 dark:focus:ring-offset-primary">
                    Privacy Policy
                  </a>
                </div>
              </div>
              <InputError class="mt-2" message={form.errors.terms}/>
            </InputLabel>
          </div>)} -->

        <div class="flex items-center justify-end mt-4">
          <Link href="" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500 dark:focus:ring-offset-primary">
          Déjà enregistré?
          </Link>

          <PrimaryButton :class="['ml-4']" :disabled="form.processing">
          Registre
          </PrimaryButton>
        </div>
      </form>
    </AuthenticationCard>
</template>
