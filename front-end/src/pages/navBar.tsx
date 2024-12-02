import { Button } from 'primereact/button';
interface NavBarProps {
    view: string;
    setView: (view: string) => void; // Fonction qui prend une chaîne de caractères en paramètre
  }
const NavBar: React.FC<NavBarProps> = ({view, setView}) => {
  return (
        <div className="container mx-auto p-4">
      <div className="nav flex space-x-4 mb-6">
        <button
          className={`buttonProduits ${view === "produits" ? "bg-primary text-white" : ""}`}
          onClick={() => setView("produits")}
        ><strong>Produits</strong></button>
        <button
          className={`buttonCategories ${view === "categories" ? "bg-secondary text-white" : ""}`}
          onClick={() => setView("categories")}
        ><strong>Catégories</strong></button>
      </div>
      </div>
  );
};

export default NavBar;
