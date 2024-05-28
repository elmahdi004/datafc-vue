<template>
    <div>
      <button
        type="button"
        @click="handleDemandClick"
        class="border border-primary max-sm:p-2 max-sm:text-sm shadow bg-primary/80 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-primary focus:outline-none focus:shadow-outline"
      >
        DEMANDE DE DEVIS
      </button>
      <Modal :show="action" @close="closeModal" maxWidth="2xl">
        <template #body>
          <div class="rounded-t bg-white mb-0">
            <div class="grid grid-cols-2">
              <div>
                <h4 class="font-bold text-xl text-primary p-2">Code de formation:</h4>
              </div>
              <div>
                <p class="font-semibold text-xl text-black p-2">{{ Code }}</p>
              </div>
            </div>
            <div class="grid grid-cols-2">
              <div class="font-bold text-xl text-primary p-2">
                <h4>Théme de formation:</h4>
              </div>
              <div>
                <p class="font-semibold text-xl text-black p-2">{{ Titre }}</p>
              </div>
            </div>
          </div>
          <hr class="w-5/6 mx-auto my-3" />
          <Tab.Group v-model="selectedIndex">
            <Tab.List class="flex space-x-2 bg-gray-100 p-4">
              <Tab v-for="(type, index) in Types" :key="index" :selected="selectedIndex === index">
                <span
                  :class="classNames(
                    'w-full rounded-lg py-2.5 text-sm font-medium leading-5',
                    'shadow ring-primary ring-opacity-60 ring-offset-2 ring-offset-primary/50 focus:outline-none',
                    selectedIndex === index
                      ? 'bg-primary/95 shadow text-white'
                      : 'text-primary bg-white hover:bg-primary/50 hover:text-white'
                  )"
                >
                  {{ type === 'physique' ? 'Personne Physique' : 'Personne Morale' }}
                </span>
              </Tab>
            </Tab.List>
            <Tab.Panels>
              <Tab.Panel v-if="typeD === 'physique'">
                <div class="flex-auto py-10 pt-0">
                  <form class="mt-4" @submit.prevent="payload_f">
                    <div class="flex flex-wrap">
                      <div class="w-full lg:w-6/12 px-4" v-for="(field, index) in physicalFields" :key="index">
                        <div class="relative w-full mb-3">
                          <InputLabel>{{ field.label }}</InputLabel>
                          <TextInput
                            v-model="field.model"
                            :type="field.type"
                            class="border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500"
                          />
                          <InputError  />
                        </div>
                      </div>
                    </div>
                    <div class="flex flex-wrap">
                      <div class="w-full lg:w-12/12 px-4">
                        <div class="relative w-full mb-3">
                          <InputLabel>Addresse</InputLabel>
                          <TextInput
                            v-model="adresse"
                            type="text"
                            :class="{'border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500': errors.adresse}"
                          />
                          <InputError :message="errors.adresse" class="mt-2" />
                        </div>
                      </div>
                      <div class="w-full lg:w-6/12 px-4">
                        <div class="relative w-full mb-3">
                          <InputLabel>Pour quel type d'organisme travaillez-vous?</InputLabel>
                          <select v-model="typeOrgpm" class="text-black border-primary focus:border-primary active:border-primary w-full rounded-lg border-[1.5px] py-2 px-5 font-medium outline-none transition">
                            <option v-for="(option, index) in orgTypes" :key="index" :value="index">{{ option }}</option>
                          </select>
                        </div>
                      </div>
                      <div class="w-full lg:w-6/12 px-4">
                        <div class="relative w-full mb-3">
                          <InputLabel>Nom d'organisme</InputLabel>
                          <TextInput
                            v-model="nomOrgpm"
                            type="text"
                            :class="{'border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500': errors.nomOrgpm}"
                          />
                          <InputError :message="errors.nomOrgpm" class="mt-2" />
                        </div>
                      </div>
                      <div class="w-full lg:w-6/12 px-4 pt-4">
                        <div class="relative w-full mb-3">
                          <p class="flex items-center justify-center mt-4 capitalize text-blueGray-600 text-xs font-bold">
                            Nombre De Participants À Former:
                          </p>
                        </div>
                      </div>
                      <div class="w-full lg:w-6/12 px-4 pt-4">
                        <div class="relative flex justify-center items-center w-full mb-3">
                          <!-- <CustomInputNumber :nbr="nbr" @update:nbr="updateNbr" /> -->
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </Tab.Panel>
              <Tab.Panel v-else>
                <div class="flex-auto py-10 pt-0">
                  <form class="mt-4" @submit.prevent="payload_f">
                    <div class="flex flex-wrap">
                      <div class="w-full lg:w-6/12 px-4" v-for="(field, index) in moralFields" :key="index">
                        <div class="relative w-full mb-3">
                          <InputLabel>{{ field.label }}</InputLabel>
                          <TextInput
                            v-model="field.model"
                            :type="field.type"
                            class="border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500"
                          />
                          <InputError class="mt-2" />
                        </div>
                      </div>
                    </div>
                    <div class="flex flex-wrap">
                      <div class="w-full lg:w-12/12 px-4">
                        <div class="relative w-full mb-3">
                          <InputLabel>Addresse</InputLabel>
                          <TextInput
                            v-model="adresse"
                            type="text"
                            :class="{'border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500': errors.adresse}"
                          />
                          <InputError :message="errors.adresse" class="mt-2" />
                        </div>
                      </div>
                      <div class="w-full lg:w-6/12 px-4">
                        <div class="relative w-full mb-3">
                          <InputLabel>Responsable ou Inerlocuteur</InputLabel>
                          <TextInput
                            v-model="resplonsable"
                            type="text"
                            :class="{'border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500': errors.resplonsable}"
                          />
                          <InputError :message="errors.resplonsable" class="mt-2" />
                        </div>
                      </div>
                      <div class="w-full lg:w-6/12 px-4">
                        <div class="relative w-full mb-3">
                          <InputLabel>Téléphone</InputLabel>
                          <TextInput
                            v-model="telres"
                            type="tel"
                            :class="{'border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500': errors.telres}"
                          />
                          <InputError :message="errors.telres" class="mt-2" />
                        </div>
                      </div>
                      <div class="w-full lg:w-6/12 px-4 pt-4">
                        <div class="relative w-full mb-3">
                          <p class="flex items-center justify-center mt-4 capitalize text-blueGray-600 text-xs font-bold">
                            Nombre de participants à former:
                          </p>
                        </div>
                      </div>
                      <div class="w-full lg:w-6/12 px-4 pt-4">
                        <div class="relative flex justify-center items-center w-full mb-3">
                          <!-- <CustomInputNumber :nbr="nbr" @update:nbr="updateNbr" /> -->
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </Tab.Panel>
            </Tab.Panels>
          </Tab.Group>
        </template>
        <template #footer>
          <button class="border-[#E9EDF9] transition hover:border-red-600 hover:bg-red-600 hover:text-white font-medium text-base py-2 px-4 rounded me-4 border" @click="closeModal">
            Annuler
          </button>
          <PrimaryButton :class="{ 'opacity-25': processing }" :disabled="processing" @click="payload_f">
            Demander un devis
          </PrimaryButton>
        </template>
      </Modal>
    </div>
  </template>
  
  <script>
  import { ref } from 'vue';
  import Modal from '@/components/Modal.vue';
  import InputLabel from '@/Components/InputLabel.vue';
  import TextInput from '@/components/TextInput.vue';
  import InputError from '@/Components/InputError.vue';
  import { TabGroup, TabList, Tab, TabPanels, TabPanel } from '@headlessui/vue'

//   import CustomInputNumber from './CustomInputNumber.vue';
  import PrimaryButton from '@/components/PrimaryButton.vue';
  
  export default {
    components: {
      Modal,
      InputLabel,
      TextInput,
      InputError,
      Tab,
      TabGroup,
      TabList,
      TabPanels,
      TabPanel,
    //   CustomInputNumber,
      PrimaryButton,
    },
    props: {
      Code: String,
      Titre: String,
    },
    setup() {
      const action = ref(true);
      
      const selectedIndex = ref(0);
      const typeD = ref('physique');
      const physicalFields = ref([
        { label: 'Nom', model: 'nom', type: 'text', modelKey: 'nom' },
        { label: 'Prénom', model: 'prenom', type: 'text', modelKey: 'prenom' },
        { label: 'Téléphone', model: 'tel', type: 'tel', modelKey: 'tel' },
        { label: 'Adresse email', model: 'email', type: 'email', modelKey: 'email' },
        { label: 'Fonction', model: 'fonction', type: 'text', modelKey: 'fonction' },
      ]);
      const moralFields = ref([
        { label: "Nom d'organisme", model: 'nomOrg', type: 'text', modelKey: 'nomOrg' },
        { label: "Secteur d'activité", model: 'secteur', type: 'text', modelKey: 'secteur' },
        { label: 'Adresse', model: 'adresse', type: 'text', modelKey: 'adresse' },
      ]);
      const errors = ref({});
      const adresse = ref('');
      const typeOrgpm = ref('');
      const nomOrgpm = ref('');
      const resplonsable = ref('');
      const telres = ref('');
      const nbr = ref(0);
      const orgTypes = ref(['Type 1', 'Type 2', 'Type 3']);
      const processing = ref(false);
  
      const handleDemandClick = () => {
        action.value = true;
      };
  
      const closeModal = () => {
        action.value = false;
      };
  
      const updateNbr = (newNbr) => {
        nbr.value = newNbr;
      };
  
      const payload_f = () => {
        // Handle form submission
      };
  
      const classNames = (...classes) => {
        return classes.filter(Boolean).join(' ');
      };
  
      return {
        action,
        selectedIndex,
        typeD,
        physicalFields,
        moralFields,
        errors,
        adresse,
        typeOrgpm,
        nomOrgpm,
        resplonsable,
        telres,
        nbr,
        orgTypes,
        processing,
        handleDemandClick,
        closeModal,
        updateNbr,
        payload_f,
        classNames,
      };
    },
  };
  </script>
  
  <style scoped>
  /* Add your styles here */
  </style>
  