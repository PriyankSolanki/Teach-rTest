import {useState} from 'react';
import ProduitsManager from "./produits/produitsManager";
import NavBar from './app/navBar';
import Logo from './app/logo';
import CategoriesManager from './categories/categoriesManager';

export default function Home() {
  const [view, setView] = useState("produits");

  return (
    <>
      <Logo/>
      <NavBar view={view} setView={setView}/>
      {view === "produits" && <ProduitsManager />}
      {view === "categories" && <CategoriesManager />}
    </>
  );
}


