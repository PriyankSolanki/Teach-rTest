import axios from "axios";

const API_BASE_URL = "http://127.0.0.1:8000/api"; 

interface categorie{
    nom:string;
}

export const fetchCategories = async () => {
  try {
    const response = await axios.get(`${API_BASE_URL}/categories`);
    return response.data; 
  } catch (error) {
    console.error("Erreur lors de la récupération des produits :", error);
    throw error;
  }
};


export const addCategories = async (newCatgories: categorie) => {
    try {
      const response = await axios.post(`${API_BASE_URL}/categories`, newCatgories);
      return response.data; 
    } catch (error) {
      console.error("Erreur lors de la récupération des produits :", error);
      throw error;
    }
  };
