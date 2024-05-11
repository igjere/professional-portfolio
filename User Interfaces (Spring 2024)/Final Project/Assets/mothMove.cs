using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class mothMove : MonoBehaviour
{
    public LevelManager levelMan;
    public float moveSpeed = 2f;
    public float directionChangeInterval = 3f;
    private Rigidbody2D rb;
    private Vector2 movement;
    private float directionTimer = 0f;

    public AudioSource SoundPlayer;
    bool MouseOn = false;

    public AudioSource KillSound;

    void Start()
    {
        rb = GetComponent<Rigidbody2D>();
        ChangeDirection();
    }

    void Update()
    {
        directionTimer += Time.deltaTime;

        if (directionTimer >= directionChangeInterval)
        {
            directionTimer = 0f;
            ChangeDirection();
        }

        RotateInMovementDirection();
    }

    void FixedUpdate()
    {
        rb.velocity = movement * moveSpeed;
    }

    private void ChangeDirection()
    {
        float angle = Random.Range(0, 360) * Mathf.Deg2Rad;
        movement = new Vector2(Mathf.Cos(angle), Mathf.Sin(angle));
    }

    private void RotateInMovementDirection()
    {
        if (movement != Vector2.zero)
        {
            float angle = Mathf.Atan2(movement.y, movement.x) * Mathf.Rad2Deg;
            angle += -90;
            transform.rotation = Quaternion.Euler(0, 0, angle);
        }
    }

    private void OnMouseOver()
    {
        if (MouseOn == false)
        {
            if (MainScript.ScreenReaderEnabled == true)
                SoundPlayer.Play();
            MouseOn = true;
        }
        Debug.Log(MouseOn);
    }

    private void OnMouseExit()
    {
        MouseOn = false;
        Debug.Log(MouseOn);
    }

    private void OnMouseDown()
    {
        StartCoroutine(KillBug());
    }

    private IEnumerator KillBug()
    {
        KillSound.Play();
        yield return new WaitForSeconds(0.3F);
        levelMan.FlyClicked();
        Destroy(gameObject);
    }
}
