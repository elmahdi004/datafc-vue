<template>
    <div class="relative w-20 me-2">
      <div @click="toggleOpen"> 
      <button-navigation :renderTrigger="renderTrigger"/>
      </div>
  
      <!-- Full Screen Dropdown Overlay -->
      <div 
        class="fixed inset-0 z-40" 
        v-if="open" 
        @click="open = false">
      </div>
  
      <transition
        enter-active-class="transition ease-out duration-200"
        enter-from-class="transform opacity-0 scale-95"
        enter-to-class="transform opacity-100 scale-100"
        leave-active-class="transition ease-in duration-75"
        leave-from-class="transform opacity-100 scale-100"
        leave-to-class="transform opacity-0 scale-95"
      >
        <div 
          v-if="open" 
          :class="['absolute z-50  mt-2 rounded-md shadow-lg', widthClass, alignmentClasses]"
          @click="open = false"
        >
          <div :class="['rounded-md ring-1 ring-black ring-opacity-5', contentClasses]">
            <slot></slot>
          </div>
        </div>
      </transition>
    </div>
  </template>
  
  <script >
  import { ref, computed } from 'vue';
  import ButtonNavigation from './ButtonNavigation.vue';
  
  export default {
    props: {
      align: {
        type: String,
        default: 'right'
      },
      width: {
        type: String,
        default: '48'
      },
      contentClasses: {
        type: String,
        default: 'py-1 bg-white '
      },
      renderTrigger: {
        // type: Function,
        required: true
      }
    },
    components:{
      ButtonNavigation
    },
    setup(props) {
      const open = ref(false);
  
      const widthClass = computed(() => {
        return {
          '48': 'w-48'
        }[props.width.toString()];
      });
  
      const alignmentClasses = computed(() => {
        if (props.align === 'left') {
          return 'origin-top-left left-0';
        } else if (props.align === 'right') {
          return 'origin-top-right right-0';
        } else {
          return 'origin-top';
        }
      });
  
      const toggleOpen = () => {
        open.value = !open.value;
      };
  
      return {
        open,
        widthClass,
        alignmentClasses,
        toggleOpen
      };
    }
  };
  </script>
  
  <style scoped>
  /* Add any additional styles here */
  </style>
  