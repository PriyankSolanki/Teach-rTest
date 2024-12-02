import axios from "axios";

const API_BASE_URL = "http://127.0.0.1:8000/api"; 

export const fetchProducts = async () => {
  try {
    const response = await axios.get(`${API_BASE_URL}/produits`);
    return response.data; 
  } catch (error) {
    console.error("Erreur lors de la récupération des produits :", error);
    throw error;
  }
};
