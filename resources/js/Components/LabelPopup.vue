<template>
    <div>
      <button @click="showModal = true" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Open Modal
      </button>
      <Modal :show="showModal" :position="modalPosition" @update:show="showModal = $event">
        <p class="text-gray-700">This is a modal!</p>
      </Modal>
    </div>
  </template>
  
  <script>
  import { ref } from 'vue'
  import Modal from './Modal.vue'
  
  export default {
    components: {
      Modal,
    },
    setup() {
      const showModal = ref(false)
      const modalPosition = ref({ top: 0, left: 0, right: 0, bottom: 0 })
  
      const handleMouseMove = (event) => {
        modalPosition.value = {
          top: event.clientY + 'px',
          left: event.clientX + 'px',
          right: (window.innerWidth - event.clientX) + 'px',
          bottom: (window.innerHeight - event.clientY) + 'px',
        }
      }
  
      return {
        showModal,
        modalPosition,
        handleMouseMove,
      }
    },
  }
  </script>
  