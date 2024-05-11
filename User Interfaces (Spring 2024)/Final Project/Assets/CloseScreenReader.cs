using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.EventSystems;

public class CloseScreenReader : MonoBehaviour, IPointerExitHandler
{
    public AudioSource SoundPlayer;

    public void Start()
    {
        SoundPlayer.Play();
        Debug.Log("COOL");
    }

    public void OnPointerExit(PointerEventData eventData)
    {
        Debug.Log("nah");
    }
}