import contractABI from "./contractABI.js"
import { ethers } from 'ethers';
import provider from "./provider.js";

const PRIVATE_KEY="b39f4b76e1524d6e3cb2891bb0697ad8a8a771af9cc10203d34f9cabc853e070"

const signer = new ethers.Wallet(PRIVATE_KEY, provider);

const contract = new ethers.Contract(contractABI.address, contractABI.ABI, signer);

export default contract