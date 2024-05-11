using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.EventSystems;

public class CreditsScreenReader : MonoBehaviour, IPointerEnterHandler, IPointerExitHandler, IPointerDownHandler
{
    public AudioSource SoundPlayer;
    public AudioSource CreditRoll;

    public void OnPointerEnter(PointerEventData eventData)
    {
        if (MainScript.ScreenReaderEnabled == true)
            SoundPlayer.Play();
        Debug.Log("Mouse on CREDITS");
    }

    public void OnPointerExit(PointerEventData eventData)
    {
        Debug.Log("nah");
    }

    public void OnPointerDown(PointerEventData eventData)
    {
        if (MainScript.ScreenReaderEnabled == true)
            CreditRoll.Play();
    }
}